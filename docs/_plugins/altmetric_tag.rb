module Jekyll
  class AltmetricTag < Liquid::Tag
    Syntax = /(#{Liquid::QuotedFragment}+)?/
    IDENTIFIERS = [:doi, :pmid, :arxiv, :arxiv_id, :handle]
    def initialize(tag_name, markup, tokens)
      @attributes = {}
      @ident_type = nil
      if markup =~ Syntax
        markup.scan(Liquid::TagAttributes) do |key, value|
          @attributes[key.to_sym] = value.gsub(/^\"/,'').gsub(/\"$/,'')
        end
      else
        raise SyntaxError.new("Syntax Error in '#{tag_name}' - Valid syntax: {% #{tag_name} doi:x %}")
      end

      IDENTIFIERS.each do |ident|
        if @attributes.has_key?(ident)
          @ident_type = case ident
                        when :arxiv then :arxiv_id
                        else ident
                        end
          @identifier = @attributes[ident]
          break
        end
      end

      unless @ident_type
        raise SyntaxError.new("Syntax Error in '#{tag_name}' - requires an identifier - one of #{IDENTIFIERS}")
      end
      @embed_type = @attributes[:type] || 'donut'

      super
    end

    def render(context)
      "<div class=\"#{css_classes}\" data-badge-type='#{@embed_type}' #{style} #{data_identifier} #{popover} #{details}> </div>"
    end

    def css_classes
      "altmetric-embed #{@attributes[:class]}".strip
    end

    def data_identifier
      "data-#{@ident_type.to_s.gsub(/_/,'-')}='#{@identifier}'"
    end

    def popover
      if @attributes.has_key?(:popover)
        "data-badge-popover='#{@attributes[:popover]}'"
      end
    end

    def details
      if @attributes.has_key?(:details)
        "data-badge-details='#{@attributes[:details]}'"
      end
    end

    def style
      if @attributes.has_key?(:float) || @attributes.has_key?(:style)
        float = if @attributes.has_key?(:float)
                  "float: #{@attributes[:float]};"
                else
                  ""
                end
        "style='#{float}#{@attributes[:style]}'"
      else
        ""
      end
    end
  end
end

Liquid::Template.register_tag('altmetric', Jekyll::AltmetricTag)

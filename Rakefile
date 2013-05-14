require 'yaml'
jekyll_config = YAML.load(File.read('_config.yml'))
deploy_dir = "deploy"
public_dir = jekyll_config['destination']
remote = `git remote -v`.match(/origin\s+(\S+)/)[1]

task :build => 'docs:build'

namespace :docs do
  desc 'Setup deploy directory for github pages'
  task :setup do
    system "mkdir -p #{deploy_dir}"
    cd "#{deploy_dir}" do
      system "git init"
      system "echo 'Nothing here yet' > index.html"
      system "git add ."
      system "git commit -m \"Initial commit\""
      system "git branch -m gh-pages"
      system "git remote add origin #{remote}"
    end
  end

  desc 'Build docs'
  task :build => :index do
    system 'jekyll build'
  end

  desc 'Push github pages'
  task :push => :build do
    puts "## Deploying Github Pages"
    (Dir["#{deploy_dir}/*"]).each { |f| rm_rf(f) }
    cp_r "#{public_dir}/.", deploy_dir
    cd "#{deploy_dir}" do
      rm_rf "jekyll" # some junk?
      system "git add ."
      system "git add -u"
      message = "Site updated at: #{Time.now.utc}"
      system "git commit -m \"#{message}\""
      system "git push origin gh-pages --force"
      puts "## Github Pages deploy done"
    end
  end

  desc 'Build index page'
  task :index do
    index_md = File.read('README.md')
    File.open('docs/index.markdown', 'w') do |fd|
      fd.write <<-END
---
layout: default
title: Altmetric WordPress Plugin
---

# README
      END
      f = File.new('README.md')
      f.each do |line|
        next if f.lineno==1
        if line =~ /\[(altmetric .+)\]/
          tag = "{% #{$1.strip.gsub(/=/,':')} %}\n"
          fd.write line
          fd.write tag
        else
          fd.write line
        end
      end
    end
  end
end



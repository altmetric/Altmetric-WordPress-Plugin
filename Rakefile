require 'yaml'
jekyll_config = YAML.load(File.read('_config.yml'))
deploy_dir = "deploy"
public_dir = jekyll_config['destination']
remote = `git remote -v`.match(/origin\s+(\S+)/)[1]

desc 'Setup deploy directory for github pages'
task :setup_github_pages do
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

namespace :pages do
  desc 'Push github pages'
  task :push do
    puts "## Deploying Github Pages"
    (Dir["#{deploy_dir}/*"]).each { |f| rm_rf(f) }
    cp_r "#{public_dir}/.", deploy_dir
    cd "#{deploy_dir}" do
      system "git add ."
      system "git add -u"
      message = "Site updated at: #{Time.now.utc}"
      system "git commit -m \"#{message}\""
      system "git push origin gh-pages --force"
      puts "## Github Pages deploy done"
    end
  end
end

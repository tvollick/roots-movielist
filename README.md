# Rivet-Trellis-WP

The Rivet-Trellis-WP template is composed of the following components:

  * [Trellis](https://github.com/roots/trellis): Trellis is an end-to-end solution for WordPress environment management.
  * [Bedrock](https://github.com/roots/bedrock): Bedrock is a modern WordPress stack that helps you get started with the best development tools and project structure.
  * [Sage](https://github.com/roots/sage): Sage is a WordPress starter theme based on HTML5 Boilerplate, gulp, Bower, and Bootstrap Sass, that will help you make better themes.

## Requirements

1. [Ansible](http://docs.ansible.com/intro_installation.html)
2. [Vagrant](http://www.vagrantup.com/downloads.html)
3. [vagrant-bindfs](https://github.com/gael-ian/vagrant-bindfs#installation)
4. [vagrant-hostsupdater](https://github.com/cogitatio/vagrant-hostsupdater#installation)
5. [NodeJS](https://nodejs.org/en/): `brew install nodejs`
6. [Bower](http://bower.io/): `npm install -g bower`
7. [Gulp](http://gulpjs.com/): `npm install -g gulp`
8. [wp-cli-dotenv-command](https://github.com/aaemnnosttv/wp-cli-dotenv-command) (At least version 0.25)

## Quick Start
1. Install all requirements (see #Requirements).
2. Create your project folder and clone this project.

        mkdir myproject  
        cd myproject  
        git clone git@bitbucket.org:wearerivet/rivet-trellis-wp.git ./  


3. Remove this projects git internals and initialize your project's git internals (you did create a project in BitBucket right?):

        rm -rf .git  
        git init  
        git remote add origin git@bitbucket.org:wearerivet/myproject.com.git  
        git add .  
        git commit -a  
        git push -u origin master  


4. Ensure Ansible dependencies and playbooks are installed:

        cd myproject/trellis  
        ansible-galaxy install -r requirements.yml  


5. Ensure project dependencies are installed:

        cd myproject/site  
        composer install  


6. If staging, complete steps 7-9, otherwise skip to 10.

7. Create the project environment file:

        cd myproject/site  
        wp dotenv init --template=.env.example  
        wp dotenv salts regenerate  


8. Update the generated .env file with the local development database parameters.
9. Update the myproject/trellis/group_vars/development/wordpress_sites.yml file with the same parameters from the generated .env file.
10. Update settings in trellis/group_vars/development/wordpress_sites.yml
11. Run `vagrant up`.

## Theme Stuff

1. Update config devUrl in /site/web/app/themes/sage/assets/manifest.json
2. Gulp watch in sage

## Other Unorganized Notes

Navigate to sage directory and run npm install and bower install

### Deployment Notes

* Generate 32 byte password to use with ansible-vault.
  * Using the command line and openssl you can generate this password with the following commands:
```
cd trellis
openssl rand -base64 32 > .vault_password.txt
chmod 400 .vault_password.txt
```

  * There is already a rule in the project .gitignore file to exclude the vault password file.
  * This password should be encrypted with rcrypt and stored in the Rivet Credentials Vault.
* Use ansible-vault encrypt/decrypt to work with sensitive environment files.
* When committing to git always ensure that sensitive files are encrypted (look at ways to automate this).
* id_rsa.pub needs to be added to ubuntu/.ssh/authorized_keys on ec2

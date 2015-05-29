INSTALLATION

# Assuming you have Composer, npm, bower, grunt, and less installed globally

# PHP deps
composer install

# Grunt deps
npm install

# JS deps
bower install

# concatenates and minimizes all bower scripts
grunt buildbower

# Compiles custom bootstrap, rerun if you edit .less files
lessc custom_bootstrap/custom-bootstrap.less > css/bootstrap.css


# Prepopulates DB for now
# You will need to create your own WP user
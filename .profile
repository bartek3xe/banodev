# Run project
run() {
    symfony server:start -d
    docker compose up --build -d
}

# Stop project
stop() {
    symfony server:stop
    docker compose down
}

# php bin/console
console() {
    php bin/console "$@"
}

# Reload whole project
reload() {
    composer install
    db
    yarn build
}

# Cache clear
cacl() {
    php bin/console cache:clear
}

# PHP quality check
stan() {
    vendor/bin/phpstan analyse
    vendor/bin/php-cs-fixer "$@" --diff --allow-risky=yes
}

# Global quality check
quality() {
    php bin/console lint:twig templates
    vendor/bin/php-cs-fixer fix --diff --allow-risky=yes
    vendor/bin/phpstan analyse -c phpstan.dist.neon src
}

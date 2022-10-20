# .DEFAULT_GOAL := help
# DC=docker-compose
# DCFPM=${DC} exec --user www-data fpm
# DCFPMROOT=${DC} exec fpm
# NODE=docker run -v "`pwd`:/app" -w /app --rm --user node node:uf bash -c

# start: traefik ## Start containers	
# 	${DC} up -d
# stop: ## Stop containers	
# 	${DC} down
# trans: ## Update translation	
# 	${DCFPM} sh -c "${SYMFONY} translation:download"

SYMFONY = php bin console

# scss / js
build-asset :
	yarn run encore dev --watch 

# Update translations 
trans:
	${SYMFONY} translation:update

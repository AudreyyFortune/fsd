SYMFONY = php bin console

# scss / js
build-asset :
	yarn run encore dev --watch 

# Update translations 
trans:
	${SYMFONY} translation:update
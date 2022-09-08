execute `rm -rf ./static`
Use docker cli to get into the container and run `./php2html . ./static -ed node_modules -ed .idea`
execute
```shell
cp ./js ./static/js -r
cp ./img ./static/img -r
cp ./images ./static/images -r
cp ./galleries/pix ./static/galleries/pix -r
```
commit and push
execute deploy script `npm run deploy`

#!/bin/bash 

echo "Composing files"

echo ""



if [[ -d "site" ]]; then
	rm -rf site

else
	cp  -r src site
	cp -r img site



fi


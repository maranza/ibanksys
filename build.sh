#!/bin/bash 

echo "Compose all the necessary files"

echo ""



if [[ -d "site" ]]; then
	rm -rf site

else
	cp  -r src site
	mv img site



fi


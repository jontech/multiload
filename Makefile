.PHONY: build run

build:
	docker build -t multiload .

run:
	docker run -it --rm -v .:/srv --name multiload-runner multiload

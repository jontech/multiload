build:
	docker build -t multiload .

run-csv:
	docker run -it --rm -v .:/srv multiload php ./run.php data.csv

run-xml:
	docker run -it --rm -v .:/srv multiload php ./run.php data.xml

run-json:
	docker run -it --rm -v .:/srv multiload php ./run.php data.json

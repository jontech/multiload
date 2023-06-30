# multiload
Loading various data formats into array.

# Building and Running with Docker

Build container:

`$ make build`

Run container with one of example data file formats:

`$ make run-csv`

`$ make run-xml`

`$ make run-json`

Or run all formats:

`$ make`

Or run directly:

`$ docker run -it --rm -v .:/srv multiload php ./run.php <FILE>`

# Or without container

`$ php ./run.php <FILE>`
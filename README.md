# multiload
Loading various data formats into array.

# Building and Running
Build container:

`$ make build`

Run container with one of example data file formats:

`$ make run-csv`

Or run directly:

`$ docker run -it --rm -v .:/srv multiload php ./run.php <FILE>`

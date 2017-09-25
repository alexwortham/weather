# Configure

Configure the desired zip codes and update intervals in `config/config.php`.
Comments in `config.php` explain this further.

# Run Server

Run `docker-compose up` from project root. Visit http://localhost:8080/index.php
or http://localhost:8080/index.php/reports to see all weather reports collected
thus far. Visit http://localhost:8080/index.php/reports/{zip} to only view
reports from the given zip code.

Note: Because weather updates are initiated via cron there may not be any results
shown immediately. They will appear after the cron job has executed. For the
impatient I recommend setting the update interval to 1 minute.

# Run Tests

Run `./runTests.php units` to execute tests.

Note: Please run the server at least once before executing tests.
This builds the docker image necessary to run both the server and the tests.

# Caveats

It is probably necessary for the user running these commands to be in the docker
system group.

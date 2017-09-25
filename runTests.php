#!/usr/bin/env php
<?php

system("docker-compose -f docker-compose.test.yml run " . $argv[1]);

#!/bin/bash
php doctrinecli.php orm:schema-tool:drop --force
php doctrinecliyaml.php orm:generate-entities . --generate-annotations="TRUE"
php doctrinecli.php orm:generate-entities . --generate-annotations="TRUE"
php doctrinecli.php orm:schema-tool:create

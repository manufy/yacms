php doctrinecli.php orm:schema-tool:drop --force
php doctrinecliyaml.php orm:generate-entities . --generate-annotations="TRUE"
cd Entities
sed -i 's/@ORM\\/@/g' *.php
sed -i 's/NONE/AUTO/g' *.php
cd ..
php doctrinecli.php orm:generate-entities . --generate-annotations="TRUE"
php doctrinecli.php orm:schema-tool:create


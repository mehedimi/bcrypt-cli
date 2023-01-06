## Bycrypt CLI
A bcrypt command line tool

### Installation
```bash
composer require mehedimi/bc-cli --global
```

#### Generate Hash
To make a hash of a string, you need to just run the `make` command, Like bellow

```bash
bc make YOUR_SECRET_TEXT
```
#### Output
```
Text: secret
Hash: $2y$10$jn/PQTiAiIOCs1u7CYOD5ePHQ6Qfe1smj7/eXPv.sAhPz3MnksJKm
```

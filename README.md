## Bycrypt CLI
A bcrypt command line tool

### Installation
```bash
composer global require mehedimi/bcrypt-cli
```

### Generate Hash
To make a hash of a string, you need to just run the `make` command, Like bellow

```bash
bcrypt make YOUR_SECRET_TEXT
```
#### Output
```
Text: secret
Hash: $2y$10$jn/PQTiAiIOCs1u7CYOD5ePHQ6Qfe1smj7/eXPv.sAhPz3MnksJKm
```
### Matching the Hash
You can check a hash token against a text by using `verify` command. Like bellow
```bash
bcrypt verify secret
```
It will ask you to provide hash token
```
Please enter the hash: $2y$10$jn/PQTiAiIOCs1u7CYOD5ePHQ6Qfe1smj7/eXPv.sAhPz3MnksJKm
```
#### Output
```
Text: secret
Hash: $2y$10$jn/PQTiAiIOCs1u7CYOD5ePHQ6Qfe1smj7/eXPv.sAhPz3MnksJKm
Match: Yes
```
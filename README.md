# Google-like values converter.

Support for different types of conversions, for examples:

- 1 kilometer -> meters
- 1 dollar -> THB
- 1 kilogram -> meters
- ...

## Usage

```
docker build -t pavinthan/converter .
```

### Start web server

```
docker run -p 8080:8080 pavinthan/converter
```

You can parse unit, from and to values as query params
eg: [`localhost:8080?unit=1&from=kilometer&to=meter`](http://localhost:8080?unit=1&from=kilometer&to=meter)

### Execute from CLI

```
docker run pavinthan/converter [UNIT] [FROM] [TO]
```

eg: `docker run pavinthan/converter 1 kilometer meter`

# A flappy endpoint

An endpoint from [Ben Wain](https://github.com/LoveSoftware)'s [Logstash talk](https://github.com/LoveSoftware/application-logging-with-logstash) which is useful for training. 

It returns a 200, 404, 500 or a slow response at random intervals.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development. I recommend 
running this on a docker based environment, so your prod is the same as your dev.

### Prerequisities

You'll need [boot2docker](http://boot2docker.io/)

### Installing

Get boot2docker running

```
boot2docker init && boot2docker up && eval $(boot2docker shellinit)
```

Then run the application with
```
docker-compose up
```

You can then see the application running by

```
curl http://$(boot2docker ip):8888/flappy
Slow response
```

## Built With

* [Silex](http://silex.sensiolabs.org/) - Which makes it super easy to make micro php services 

## Contributing
Feel free to submit pull requests and issues. If it's a particularly large PR, you may wish to discuss it in an issue first.

Please note that this project is released with a [Contributor Code of Conduct](https://github.com/PurpleBooth/flappy-endpoint/blob/master/code_of_conduct.md). By participating in this project you agree to abide by its terms.

## Versioning

We use [SemVer](http://semver.org/) for the version tags available See the tags on this repository. 

## Authors

* **Ben Waine** - *He wrote it, go see his talks!* - [LoveSoftware](https://github.com/LoveSoftware)
* **Billie Thompson** - *Ported the dev environment to Docker* - [PurpleBooth](https://github.com/PurpleBooth)

See also the list of [contributors](https://github.com/PurpleBooth/flappy-endpoint/contributors) who participated in this project.

## License

This component a of Ben Waines Logstash talk is replicated with kind permission from Ben Waine. For licensing see the [original repository](https://github.com/LoveSoftware/application-logging-with-logstash).

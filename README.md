<p align="center"><a href="https://alicki.me" target="_blank"><img src="https://i.imgur.com/0kLoa9P.png" width="220" alt="Aspira Intelligence Tools Logo"></a></p>

## About GPT-3 Sentiment

This is a very basic and simple app that allows you to insert a string into a textfield and then get the
general sentiment of that string based on `GPT-3 text-davinci-003` processing.

It's built in Laravel currently, as the idea for this began as something akin to suite of tools and ways to
utilize AI within an organization.

## Requirements
- PHP 8.1+
- Docker
- Laravel Sail


## Local Development

This was developed using [Laravel Sail](https://laravel.com/docs/9.x/sail), which means you'll need Docker.

Once you have Sail and Docker set up, you'll see that the build/image is essentially the default.

## License

The GPT-3 Sentiment Checker is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


## Roadmap & Future Plans

###Version 1.0

In order to get to Version 1.0, I imagine this tool will have plenty of test coverage and a live demo for others to see how this works.

If costs become an issue, I will utilize a video to demonstrate the capabilities.

- Implement https://github.com/openai-php/laravel instead of the current GPT-3 AI library.
- Add Unit Tests.
- Setup live-demo for previewing what this does.
- Resolve a small bug that occurs when an error is triggered on the results page, and a secondary analysis is performed or a page
refresh happens (POST route issue).


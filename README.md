
------

## Parent Task

We have two providers collect data from them in json files we need to read and make some filter operations on them to get the result ...

### Task Link

- [Task](https://bitbucket.org/parent_api/workspace/snippets/5LaXBq)

## Requirements

PHP 7.3 or higher with Laravel 8.

## Installation

<ul>
<li>clone the repo.</li>
<li>cd to project.</li>
<li>Run composer Install.</li>
<li>copy .env.example to .env.</li>
<li>put  env variable PROVIDERS_PATH to sign file path.</li>
</ul>
---------------------------------------------------------

## Note

<p>If You want run by docker just you need install docker desktop and run ./vendor/bin/sail up .</p>
<p> the default files to read in this path storage/app/files/</p>


### Packges  Used

- [Laravel Sail](https://laravel.com/docs/8.x/sail)
- [JsonReader](https://github.com/pcrov/JsonReader)


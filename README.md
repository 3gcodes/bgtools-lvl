## BG Tools Demo

This is a quick and dirty Laravel project based around a board game collection API.

Available Routes:

- POST            api/auth/login
- POST            api/auth/register
- GET             api/games
- GET             api/games/{game} 
- POST            api/players/addToCollection


Steps to run locally:

- `docker compose up` - this will start a local MySQL instance. Creds are valid in the `.env.example` file.
- copy `env.example` to `.env`
- `php artisan migrate --seed` - There is a little bit of data just so `GET: /api/games` works.
- `php artisan serve`
- `http POST :8000/api/auth/register name=<name> email=<email> password=<password> `
- `http POST :8000/api/auth/login email=<email> password=<password>`
- Copy the given token and use it as bearer for future requests like:
  - `http GET -A bearer -a <token> :8000/api/games`

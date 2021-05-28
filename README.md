# API-REST com PHP

- Essa API foi desenvolvida no padrão REST usando PHP, não possui as melhores práticas ou padrões de projeto poís está foi apenas uma tentativa do desenvolvimento de uma API-REST com PHP. qualquer crítica, fork ou contribuição é bem vinda !!

## ROTAS 

### CREATE MUSIC

MÉTODO : *POST* 
URI    : */backend/?/create_song*

#### EXEMPLO DE USO

```js
		import axios from "axios";

		const options = {
		  method: 'POST',
		  url: 'http://127.0.0.1/iuri/API_MUSICAS/backend/',
		  params: {'/create_song': ''},
		  headers: {'Content-Type': 'application/json'},
		  data: {
		    name: 'alguma coisa',
		    singer: 'cobalto',
		    time: '1-00s',
		    description: 'ddjd dddmd ddjjd'
		  }
		};

		axios.request(options).then(function (response) {
		  console.log(response.data);
		}).catch(function (error) {
		  console.error(error);
		});
```

#### RESPONSE

- SUCESSO => 201
- ERRO => 501

### TAKE ALL MUSICS

MÉTODO : *GET* 
URI    : */backend/?/take_songs*

#### EXEMPLO 

```js
		import axios from "axios";

		const options = {
		  method: 'GET',
		  url: 'http://127.0.0.1/iuri/API_MUSICAS/backend/',
		  params: {'/take_songs': ''}
		};

		axios.request(options).then(function (response) {
		  console.log(response.data);
		}).catch(function (error) {
		  console.error(error);
		});
```

#### RESPONSE

- STATUS 200

```json
		[
		  {
		    "id": "1",
		    "name": "alalal",
		    "time": "10s",
		    "description": "ddjd dddmd ddjjd",
		    "singer": "claudio"
		  },
		  {
		    "id": "2",
		    "name": "alalal",
		    "time": "10s",
		    "description": "ddjd dddmd ddjjd",
		    "singer": "claudio"
		  }
		]
```

- STATUS 401

	- não existem musicas

### TAKE ONE MUSIC

MÉTODO : *GET* 
URI    : */backend/?idToSearch=9999*

#### EXEMPLO

```js
		import axios from "axios";

		const options = {
		  method: 'GET',
		  url: 'http://127.0.0.1/iuri/API_MUSICAS/backend/',
		  params: {idToSearch: '4'}
		};

		axios.request(options).then(function (response) {
		  console.log(response.data);
		}).catch(function (error) {
		  console.error(error);
		});
```

#### RESPONSE

- STATUS 404
	- POSTAGEM NÃO ENCONTRADA
- STATUS 200
```json
			{
			  "id": "4",
			  "nome": "alguma coisa",
			  "duration": "1-00s",
			  "singer": "cobalto",
			  "description": "ddjd dddmd ddjjd"
			}
```

### DELETE MUSIC

MÉTODO : *DELETE*
URI    : */backend/?idToDelete=9999*

```js
		import axios from "axios";

		const options = {
		  method: 'DELETE',
		  url: 'http://127.0.0.1/iuri/API_MUSICAS/backend/',
		  params: {idToDelete: '5'}
		};

		axios.request(options).then(function (response) {
		  console.log(response.data);
		}).catch(function (error) {
		  console.error(error);
		});
```

#### RESPONSE 
- STATUS 301
	- deletado com sucesso
- STATUS 404
	- não encontrada a musica

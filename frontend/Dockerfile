FROM node:alpine

# instala um servidor http simples para servir conteúdo estático
RUN npm install -g http-server

RUN mkdir /usr/app

WORKDIR /usr/app

COPY package.json yarn.lock ./

RUN yarn --production

COPY . ./

RUN npm run build

EXPOSE 8080

CMD [ "http-server", "dist" ]
FROM node:alpine

RUN mkdir /usr/app

WORKDIR /usr/app

COPY package.json yarn.lock ./

RUN yarn --production

COPY . ./

CMD ["yarn", "serve"]


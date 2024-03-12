# dev
FROM node:20-alpine3.18 as develop-stage
WORKDIR /app
COPY package*.json ./
RUN yarn global add @quasar/cli
COPY .. .

#build
FROM develop-stage as build-stage
RUN yarn
RUN quasar build

#prod
FROM nginx:1.25.4-alpine as production-stage
COPY --from=build-stage /app/dist/spa /usr/share/nginx/html
COPY nginx.default.conf /etc/nginx/conf.d/default.conf
EXPOSE 80
CMD ["nginx", "-g", "daemon off;"]

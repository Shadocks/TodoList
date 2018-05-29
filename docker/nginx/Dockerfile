FROM nginx:alpine
RUN mkdir -p /var/www/projet8 \
    && rm -rf /etc/nginx/conf.d/default.conf

COPY ./conf/core/nginx.conf /etc/nginx/conf/nginx.conf
COPY ./conf/development /etc/nginx/conf.d/
RUN ls -l /etc/nginx/conf.d
EXPOSE 80
CMD ["nginx", "-g", "daemon off;"]

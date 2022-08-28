#!/bin/bash


echo -e "$Привет, ${USER}! Сейчас начнем инициализацию проекта, продолжить? [y/n]";
rm .env;
echo -en "${INPUT}";
read continue;

if [[ ${continue} != "y" ]]; then
	exit 1;
fi

echo -e "DOCKER_USER=${USER}" >> .env
echo -e "DOCKER_UID=${ID}" >> .env
echo -e "APP_BASE_URL=127.0.0.1" >> .env


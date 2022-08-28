#!/bin/bash


echo -e "[INFO] Привет, ${USER}! Сейчас начнем инициализацию проекта, продолжить? [y/n]";
touch .env;
echo -en "${INPUT}";
read continue;

if [[ ${continue} != "y" ]]; then
	exit 1;
fi

echo -e "DOCKER_USER=${USER}" >> .env
echo -e "DOCKER_UID=$(id -u)" >> .env
echo -e "APP_BASE_URL=127.0.0.1" >> .env

echo "[STATUS] OK"
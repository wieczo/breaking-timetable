#!/bin/bash
rm -rf release
mkdir release

rsync -av \
  --exclude=node_modules \
  --exclude=vendor \
  --exclude=public/hot \
  --exclude=public/build \
  --exclude=storage/app/public \
  --exclude=.env \
  --exclude=.git \
  --exclude=tests \
  --exclude=docker \
  --exclude=docker-compose* \
  --exclude=.gitignore \
  --exclude=*.log \
  ./ release/


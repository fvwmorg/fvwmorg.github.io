FROM alpine:latest

RUN export PATH="/root/.rbenv/bin:$PATH"

RUN apk update && apk upgrade
RUN apk add \
	curl \
	wget \
	bash \
	cmake \
	ruby \
	ruby-bundler \
	ruby-dev \
	jekyll \
	libatomic \
	readline \
	readline-dev \
	libxml2 \
	libxml2-dev \
	libxslt \
	libxslt-dev \
	libffi-dev \
	zlib-dev \
	zlib \
	build-base \
	git

RUN gem install github-pages

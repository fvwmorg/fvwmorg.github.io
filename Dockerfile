FROM debian:bookworm

RUN apt update && apt -y upgrade
RUN apt -y install \
	jekyll \
	python3-pygments


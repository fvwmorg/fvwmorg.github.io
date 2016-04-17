RELEASE=2.6.6

all:
	sed -e "s/%%RELEASE%%/$(RELEASE)/g" index.md.in > index.md
	wget -O documentation/developers/DEVELOPERS.md \
		https://raw.githubusercontent.com/fvwmorg/fvwm/master/docs/DEVELOPERS.md
	jekyll build

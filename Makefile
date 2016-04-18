RELEASE=2.6.6

all:
	sed -i "/fvwm-version:/c\fvwm-version: $(RELEASE)" _config.yml
	wget -O documentation/developers/DEVELOPERS.md \
		https://raw.githubusercontent.com/fvwmorg/fvwm/master/docs/DEVELOPERS.md

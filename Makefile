#---------------------------------------------------------------------
#-  File          : Makefile
#-  Project       : Fvwm web site 
#-  Date          : Mon Mar 31 09:25:14 2003
#-  Programmer    : Uwe Pross
#---------------------------------------------------------------------

LATEST_TARBALL = $(shell ls -t packed | sed '1!d')
ACTUAL_TARBALL = $(shell date "+packed/fvwm_php_diff_%d%m%Y_%H%M.tgz")

default:
	@echo "Fvwm web - Makefile"
	@echo "Targets are:"
	@echo "tarball: builds a tarball containing the _new_ fvwm php web page"
	@echo "diffball: builds a tarball containing files changed since latest tarball"

tarball:
	@echo "Building tarball"
	mkdir -p packed
	tar czv  \
	-f `date "+packed/fvwm_php_%d%m%Y_%H%M.tgz"` \
	`find -name '*php' -or -name '*inc'` \
	fvwm_cats/small_* fvwm_cats/*php \
	temporary pictures php_info \
	navgen_write documentation \
	contact latest_news.txt Makefile

diffball:
	@echo "Building diff tarball $(ACTUAL_TARBALL)"
	tar czvf $(ACTUAL_TARBALL) \
	`find -newer packed/$(LATEST_TARBALL) -type f`
	ls -l $(ACTUAL_TARBALL)

## end of file
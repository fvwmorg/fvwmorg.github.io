#---------------------------------------------------------------------
#-  File          : Makefile
#-  Project       : Fvwm web site 
#-  Date          : Mon Mar 31 09:25:14 2003
#-  Programmer    : Uwe Pross
#-  Last modified : <31.03.2003 17:21:37 uwp>
#---------------------------------------------------------------------

default:
	@echo "Fvwm web - Makefile"
	@echo "Targets are:"
	@echo "tarball: builds a tarball containing the _new_ fvwm php web page"

tarball:
	@echo "Building tarball"
	mkdir -p packed
	tar czf `date "+packed/fvwm_php_%d%m%Y_%H%M.tgz"` \
	`find -name '*php' -or -name '*inc'` \
	fvwm_cats temporary pictures php_info \
	navgen_write documentation \
	contact latest_news.txt Makefile

## end of file
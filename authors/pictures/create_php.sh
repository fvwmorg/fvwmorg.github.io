#!/bin/sh

Bob_Woodside='http://www.woodsway.com'

Dan_Espen='http://mywebpages.comcast.net/despen/'

Brady_Montz='http://www.cs.arizona.edu/xkernel/www/people/bradym.html'

Paul_Smith='http://paulandlesley.org/'

Steve_Robbins='http://www.cs.mcgill.ca/~stever/'

Marcus_Lundblad='http://tempo.update.uu.se/~ml/'

Richard_Lister='http://cns.georgetown.edu/~ric/'

Michael_Han='http://www.mikehan.com/'

Cameron_Simpson='http://www.cskk.ezoshosting.com/cs/'

Uwe_Pross='http://www-user.tu-chemnitz.de/~uwp/'

Mikhael_Goikhman='http://migo.sixbit.org/'

files=`ls *.jpg | grep -v small | sed 's+.jpg++'` 

for name in $files; do
    entry_name=`echo $name | sed 's+-.*$++'`
    site=`eval echo \\$$entry_name`
    real_name=`echo $entry_name | sed 's+_+\\\\ +g'`
    echo $real_name
    sed 's/@NAME@/'"$real_name"'/g;s/@FILE@/'"$name"'/' template.php_ > ${name}.php && \
	echo "Creating ${name}.php"
    test "$site" && \
	test -w ${name}.php && \
	sed 's+.*@WEBSITE@.*+<a href="'"${site}"'">Personal Website</a>+' ${name}.php > tmp && \
	mv tmp ${name}.php && echo "  Added web site link"
done 



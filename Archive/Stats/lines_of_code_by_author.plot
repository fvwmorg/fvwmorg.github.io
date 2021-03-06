set terminal png transparent size 640,240
set size 1.0,1.0

set terminal png transparent size 640,480
set output 'lines_of_code_by_author.png'
set key left top
set yrange [0:]
set xdata time
set timefmt "%s"
set format x "%Y-%m-%d"
set grid y
set ylabel "Lines"
set xtics rotate
set bmargin 6
plot 'lines_of_code_by_author.dat' using 1:2 title "domivogt" w lines, 'lines_of_code_by_author.dat' using 1:3 title "olicha" w lines, 'lines_of_code_by_author.dat' using 1:4 title "migo" w lines, 'lines_of_code_by_author.dat' using 1:5 title "dane" w lines, 'lines_of_code_by_author.dat' using 1:6 title "hippo" w lines, 'lines_of_code_by_author.dat' using 1:7 title "griph" w lines, 'lines_of_code_by_author.dat' using 1:8 title "tadam" w lines, 'lines_of_code_by_author.dat' using 1:9 title "steve" w lines, 'lines_of_code_by_author.dat' using 1:10 title "clasen" w lines, 'lines_of_code_by_author.dat' using 1:11 title "scott" w lines, 'lines_of_code_by_author.dat' using 1:12 title "renato" w lines, 'lines_of_code_by_author.dat' using 1:13 title "drbob" w lines, 'lines_of_code_by_author.dat' using 1:14 title "chrisr" w lines, 'lines_of_code_by_author.dat' using 1:15 title "psmith" w lines, 'lines_of_code_by_author.dat' using 1:16 title "malu" w lines, 'lines_of_code_by_author.dat' using 1:17 title "Thomas Adam" w lines, 'lines_of_code_by_author.dat' using 1:18 title "stric" w lines, 'lines_of_code_by_author.dat' using 1:19 title "bgiaccio" w lines, 'lines_of_code_by_author.dat' using 1:20 title "Dominik Vogt" w lines, 'lines_of_code_by_author.dat' using 1:21 title "jpweber" w lines

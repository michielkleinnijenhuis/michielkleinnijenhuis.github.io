rsync -avz /Users/michielk/CloudStationWeb/www/* michielk@jalapeno.fmrib.ox.ac.uk:/home/fs0/michielk/www/

cd ~workspace/www/dev
convert -resize 800x600 -extent 800x600 -gravity center -background black slicvoxels.png ../data1/images/si_2014_3de.png
convert -resize 64x48 -extent 64x48 -gravity center -background black slicvoxels.png ../data1/tooltips/si_2014_3de.png

convert -resize 800x600 -extent 800x600 -gravity center -background black CC_PLI.png ../data1/images/si_2014_pli.png
convert -resize 64x48 -extent 64x48 -gravity center -background black CC_PLI.png ../data1/tooltips/si_2014_pli.png

convert -resize 800x600 -extent 800x600 -gravity center CWMA.tiff ../data1/images/si_2014_wma.png
convert -resize 64x48 -extent 64x48 -gravity center CWMA.tiff ../data1/tooltips/si_2014_wma.png

for im in `ls *.png`; do
convert $im -compress lzw $im
done


convert -resize 800x600 -extent 800x600 -gravity center -background black stack+particles.fw.png ../data1/images/si_2014_3de.png
convert ../data1/images/si_2014_3de.png -compress lzw ../data1/images/si_2014_3de.png
convert -resize 64x48 -extent 64x48 -gravity center -background black stack+particles.fw.png ../data1/tooltips/si_2014_3de.png
convert ../data1/tooltips/si_2014_3de.png -compress lzw ../data1/tooltips/si_2014_3de.png

convert sectionfield1.png -compress lzw sectionfield1.png

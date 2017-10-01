OPTIONS_DEBUG=-ggdb -g3 -Wall
OPTIONS_RELEASE=-O3 
OPTIONS=$(OPTIONS_RELEASE)
INCPATH=/home/bayashi/Coding/Include
LIBPATH=/home/bayashi/Coding/Include

all : main

main: main.o Makefile $(LIBPATH)/tgapaint.o $(LIBPATH)/gset.o $(LIBPATH)/pbmath.o $(LIBPATH)/bcurve.o
	gcc $(OPTIONS) main.o $(LIBPATH)/tgapaint.o $(LIBPATH)/pbmath.o $(LIBPATH)/gset.o $(LIBPATH)/bcurve.o -o main -lm

main.o : main.c Makefile
	gcc $(OPTIONS) -I$(INCPATH) -c main.c

clean : 
	rm -rf *.o main
	
test :
	main out.tga -rnd

valgrind :
	valgrind -v --track-origins=yes --leak-check=full --gen-suppressions=yes --show-leak-kinds=all ./main

video:
	avconv -r 20 -i ./Frames/frame%03d.tga -b:v 2048k video.mp4

frames:
	rm ./Frames/*; main out.tga -rnd

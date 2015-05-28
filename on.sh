# !/bin/sh
# enciende.sh
# Exportamos el pin deseado y lo establecemos a salida
gpio export $1 out

# Escribimos un 1
gpio -g write $1 1

## Liberamos el pin asociado
#gpio unexport $1

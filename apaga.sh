# !/bin/sh
# apaga.sh
# Exportamos el pin deseado y lo establecemos a salida
gpio export $1 out

# Escribimos un 0. En teoria con el export ya se pone a 0 pero 
# lo escribimos para mayor seguridad
gpio -g write $1 0

# Liberamos el pin asociado
gpio unexport $1

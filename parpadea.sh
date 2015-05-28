# !/bin/sh
# parpadea.sh
retardo=0.25s
# Exportamos el pin deseado y lo establecemos a salida
gpio export $1 out

# Escribimos un 1
gpio -g write $1 1
sleep $retardo
gpio -g write $1 0
sleep $retardo
gpio -g write $1 1
sleep $retardo
gpio -g write $1 0
sleep $retardo
gpio -g write $1 1
sleep $retardo
gpio -g write $1 0
sleep $retardo
gpio -g write $1 1
sleep $retardo
gpio -g write $1 0
sleep $retardo
gpio -g write $1 1
sleep $retardo
gpio -g write $1 0
sleep $retardo

# Liberamos el pin asociado
gpio unexport $1


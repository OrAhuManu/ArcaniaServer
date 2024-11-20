import os
import psutil

def get_temperature():
    # Simulated for Raspberry Pi
    return psutil.sensors_temperatures()['cpu-thermal'][0].current

print(get_temperature())

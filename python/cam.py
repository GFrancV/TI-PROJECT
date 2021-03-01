import sys
import cv2 as cv
from requests import (post, get)

camera = cv.VideoCapture(0)
delay = 2000
url1 ='http://127.0.0.1/Projeto/upload.php'
url2 ='http://127.0.0.1/Projeto/api/api.php?nome=metal&area=seguranca_cidade'

def send_file(file):
    print("A enviar ficheiro para a web")
    r = post(url1, files=file)
    print(r.status_code, "---", r.text)

try:
    print("Prima CTRL+C para terminar") 
    while True:
        resposta = get(url2)
        print("\n\nSmoke: ", float(resposta.text))
        if(resposta.status_code == 200):
            if(float(resposta.text) > 19):
                print("---------------------------")
                print("A capturar Imagem")
                ret, image = camera.read()
                print("Resultado da camera=" + str(ret))
                print("A gravar imagem em disco")
                cv.imwrite('webcam.jpg', image)
                file = {'imagem': open('webcam.jpg', 'rb')}
                send_file(file)
        print("Proxima captura de imagem dentro de " + str(delay/1000) + "segundos...")
        cv.waitKey(delay)
        
except KeyboardInterrupt:
    print("Programa terminado pelo utilizador")
    
except:
    print("Ocurreu um erro", sys.exc_info())
finally:
    print("Fim Programa")
    camera.release()
    cv.destroyAllWindows()
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>
const char *ssid = "oppo";
const char *password = "qwertyuio";
String location = "Barangay, Street, Name of River or /Bridge";
String deviceID = "SWLMD-001";
const char *serverName = "http://192.168.43.117/mygit/finals_thesis/php/controller/post_data.php";

#include <SoftwareSerial.h>
SoftwareSerial NodeMCU(D3, D2);
int data;
void setup() {
  // put your setup code here, to run once:
  NodeMCU.begin(9600); // RECEIVES COM FROM ARDUINO
  Serial.begin(115200);// SENDS COM FROM ESP
  delay(10);
  WiFi.begin(ssid, password);
  Serial.print("Connecting to ");
  Serial.print(ssid);
  int i = 0;
  while (WiFi.status() != WL_CONNECTED)
  {
    delay(1000);
    Serial.print(++i);
    Serial.print(' ');
  }
  Serial.println('\n');
  Serial.println("Connection established!");
  Serial.print("IP address:\t");
  Serial.println(WiFi.localIP());
}

void loop() {

  //  delay(1000);
  if (WiFi.status() == WL_CONNECTED)
  {
    NodeMCU.write('s');
    if (NodeMCU.available() > 0) {
      data = NodeMCU.read();
//      Serial.println(data);

      WiFiClient client;
      HTTPClient http;
      http.begin(client, serverName);

      http.addHeader("Content-Type", "application/x-www-form-urlencoded");

      // Prepare your HTTP POST request data
      String httpRequestData = "d_id=" + deviceID + "&d_l=" + location + "&d_d=" + String(data);
      Serial.print("httpRequestData: ");
      Serial.println(httpRequestData);
      int httpResponseCode = http.POST(httpRequestData);
      if (httpResponseCode > 0)
      {
        Serial.print("HTTP Response code: ");
        Serial.println(httpResponseCode);
      }
      else
      {
        Serial.print("Error code: ");
        Serial.println(httpResponseCode);
      }
      http.end();
    }
  }
  else
  {
    Serial.println("WiFi Disconnected");
  }
  delay(1000);
}

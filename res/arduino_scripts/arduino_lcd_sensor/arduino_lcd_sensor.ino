#define led_g 4
#define led_y 5
#define led_r 6
#define buzzer_r 7
#define sensorPin A0
int val = 0;

#include <Wire.h>
#include <LiquidCrystal_I2C.h>
#include <SoftwareSerial.h>
SoftwareSerial Uno(2, 3);
// Set the LCD address to 0x27 for a 16 chars and 2 line display
LiquidCrystal_I2C lcd(0x27, 20, 4);

void setup()
{
  Serial.begin(9600);
  Uno.begin(9600);
  lcd.begin();
  // Turn on the blacklight and print a message.
  lcd.backlight();


  pinMode(led_g, OUTPUT);
  pinMode(led_y, OUTPUT);
  pinMode(led_r, OUTPUT);
  pinMode(buzzer_r, OUTPUT);

  digitalWrite(led_g, LOW);
  digitalWrite(led_y, LOW);
  digitalWrite(led_r, LOW);
  digitalWrite(buzzer_r, LOW);
}

void loop()
{
  int level = readSensor();
  //  Serial.println(level);
  if (Uno.available() > 0)
  {
    char c = Uno.read();
    if (c == 's')
    {
      if ((level >= 0) && (level <= 400))
      {
        digitalWrite(led_g, HIGH);
        digitalWrite(led_y, LOW);
        digitalWrite(led_r, LOW);
        digitalWrite(buzzer_r, LOW);
        lcd.clear();
        lcd.print("Water Level [1]");
        lcd.setCursor(0, 1);
        lcd.print("Normal");
        Serial.println(level);
        Uno.write(1);

      }
      else if ((level >= 401) && (level <= 600))
      {
        digitalWrite(led_g, LOW);
        digitalWrite(led_y, HIGH);
        digitalWrite(led_r, LOW);
        digitalWrite(buzzer_r, LOW);
        lcd.clear();
        lcd.print("Water Level [2]");
        lcd.setCursor(0, 1);
        lcd.print("Caution");
        Serial.println(level);
        Uno.write(2);
      }
      else if ((level >= 601) && (level <= 1000))
      {
        digitalWrite(led_g, LOW);
        digitalWrite(led_y, LOW);
        digitalWrite(led_r, HIGH);
        digitalWrite(buzzer_r, HIGH);
        //LCD
        lcd.clear();
        lcd.print("Water Level [3] Danger");
        lcd.setCursor(0, 1);
        lcd.print("DANGER");
        Serial.println(level);
        //SEND TO ESP
        Uno.write(3);
        //LED & Buzzer Indicator
      }
      delay(1000);
    }
  }
}


//Sensor
int readSensor()
{
  //  digitalWrite(sensorPower, HIGH); // Turn the sensor ON
  //  delay(10);                       // wait 10 milliseconds
  val = analogRead(sensorPin);     // Read the analog value form sensor
  //  digitalWrite(sensorPower, LOW);  // Turn the sensor OFF
  return val;                      // send current reading
}


#include <SPI.h>
#include <MFRC522.h>


#define SS_PIN D4
#define RST_PIN D2
const int pinBuzzer = D1;
int b[5] = {247, 494, 988, 1976, 3951};
int rojo = D0;
int verde = D8;

MFRC522 mfrc522(SS_PIN, RST_PIN); // Instance of the class


void setup() {
  Serial.begin(115200);
  SPI.begin();       // Init SPI bus
  mfrc522.PCD_Init(); // Init MFRC522
  pinMode(rojo, OUTPUT);
  pinMode(verde, OUTPUT);

}

void loop() {

  if ( mfrc522.PICC_IsNewCardPresent())

  {
    if ( mfrc522.PICC_ReadCardSerial())
    {
      Serial.print("Tag UID:");
      for (byte i = 0; i < mfrc522.uid.size; i++) {
        Serial.print(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " ");
        Serial.print(mfrc522.uid.uidByte[i], HEX);
      }
      tone(pinBuzzer, b[5], 1000);
      digitalWrite(verde, HIGH);
      digitalWrite(rojo, LOW);
      delay(250);
      digitalWrite(verde, LOW);
      digitalWrite(rojo, HIGH);
      noTone(pinBuzzer);
      Serial.println();
      mfrc522.PICC_HaltA();
    }
  }
}

<?php
use \NotificationListTester;
class CreatingFrontCest
{
//---------------------------AUTORIZATION---------------------------------------
    
    /**
     * @group q
     */
    public function Login(NotificationListTester $I){
        InitTest::Login($I);
    }   
    
    
    
//---------------------------TEXT ELEMENT PRESENCE------------------------------
    
    /**
     * @group q
     */
    public function VerifyTextElement(NotificationListTester $I){
        $I->amOnPage(NotificationCreateFrontPage::$PageURL);
        $I->scrollToElement($I, '.infoBut.isDrop');
        $I->click(NotificationCreateFrontPage::$ButtonOnPage);
        $I->waitForText('Сообщить о появлении');
        $I->see('Сообщить о появлении', NotificationCreateFrontPage::$TitleWindow);
        $I->see('Смартфон Samsung GT-S7530 Omnia M EAA Deep Grey',  NotificationCreateFrontPage::$LinkNameProduct);    
        $I->see('100', NotificationCreateFrontPage::$PriceMaine);
        $I->see('Ваше имя:', NotificationCreateFrontPage::$FieldUserName);
        $I->see('E-mail', NotificationCreateFrontPage::$FildEmailName);
        $I->see('*', NotificationCreateFrontPage::$FildUserStar);
        $I->see('*', NotificationCreateFrontPage::$FildEmeilStar);
        $I->see('Телефон:', NotificationCreateFrontPage::$FildPhoneName);
        $I->see('Комментарий:', NotificationCreateFrontPage::$FildCommentName);
        $I->see('Отправить', NotificationCreateFrontPage::$ButtonSendPresent);
        $I->see('Вы получите письмо, когда товар будет доступен', NotificationCreateFrontPage::$MessageInWindow);
        }
        
        
        
//--------------------------ELEMENT PRESENCE------------------------------------
        
    /**
     * @group a
     */    
    public function VerifyTElement(NotificationListTester $I){
        $I->amOnPage(NotificationCreateFrontPage::$PageURL);
        $I->scrollToElement($I, '.infoBut.isDrop');
        $I->click(NotificationCreateFrontPage::$ButtonOnPage); 
        $I->waitForText('Сообщить о появлении');
        $I->seeElement(NotificationCreateFrontPage::$ButtonX);
        $I->seeElement(NotificationCreateFrontPage::$FildUserPresent);
        $I->seeElement(NotificationCreateFrontPage::$FildEmeilPresent);
        $I->seeElement( NotificationCreateFrontPage::$FildCommentPresent);
        $I->seeElement(NotificationCreateFrontPage::$FildCommentPresent);
        }  
        
        
        
//-----------------------MESSAGE MANDATORY FIELD NAME---------------------------
        
    /**
     * @group a
     */    
    public function Message1FildName (NotificationListTester $I){
        $I->amOnPage(NotificationCreateFrontPage::$PageURL);
        $I->scrollToElement($I, '.infoBut.isDrop');
        $I->click(NotificationCreateFrontPage::$ButtonOnPage);
        $I->waitForText('Сообщить о появлении');
        $I->fillField(NotificationCreateFrontPage::$FildUserPresent, '');
        $I->click(NotificationCreateFrontPage::$ButtonSendPresent);
        $I->waitForElement(NotificationCreateFrontPage::$FildUserMessage);
        $I->see('Поле Имя является обязательным.', NotificationCreateFrontPage::$FildUserMessage);
        }
        
        
        
//-----------------------MESSAGE LINITATION FIELD NAME--------------------------
        
    /**
     * @group a
     */    
    public function Message2FildName (NotificationListTester $I){  
        $I->amOnPage(NotificationCreateFrontPage::$PageURL);
        $I->scrollToElement($I, '.infoBut.isDrop');
        $I->click(NotificationCreateFrontPage::$ButtonOnPage);
        $I->waitForText('Сообщить о появлении');
        $I->fillField(NotificationCreateFrontPage::$FildUserPresent, '1234567890qwertyuiop asdfghj123kl; +_)(*&^%$# ЙЦУКЕНГШЩЗОР');
        $I->click(NotificationCreateFrontPage::$ButtonSendPresent);
        $I->waitForElement(NotificationCreateFrontPage::$FildUserMessage);
        $I->see('Поле Имя не может превышать 50 символов в длину.', NotificationCreateFrontPage::$FildUserMessage);
        }  
        
        
        
//-----------------------MESSAGE MANDATORY FIELD EMEIL--------------------------
        
    /**
     * @group a
     */    
    public function Message1FildEmeil (NotificationListTester $I){
        $I->amOnPage(NotificationCreateFrontPage::$PageURL);
        $I->scrollToElement($I, '.infoBut.isDrop');
        $I->click(NotificationCreateFrontPage::$ButtonOnPage);
        $I->waitForText('Сообщить о появлении');
        $I->fillField(NotificationCreateFrontPage::$FildEmeilPresent, '');
        $I->click(NotificationCreateFrontPage::$ButtonSendPresent);
        $I->waitForElement(NotificationCreateFrontPage::$FildEmeilMessage);
        $I->see('Поле Email является обязательным.', NotificationCreateFrontPage::$FildEmeilMessage);
        } 
        
        
        
//-----------------------MESSAGE CORRECTLY FIELD EMEIL--------------------------
        
    /**
     * @group a
     */    
    public function Message2FildEmeil (NotificationListTester $I){
        $I->amOnPage(NotificationCreateFrontPage::$PageURL);
        $I->scrollToElement($I, '.infoBut.isDrop');
        $I->click(NotificationCreateFrontPage::$ButtonOnPage);
        $I->waitForText('Сообщить о появлении');
        $I->fillField(NotificationCreateFrontPage::$FildEmeilPresent, 'йцу 123 !!!!!!! ЗЩШЗШ');
        $I->click(NotificationCreateFrontPage::$ButtonSendPresent);
        $I->waitForElement(NotificationCreateFrontPage::$FildEmeilMessage);
        $I->see('Поле Email должно содержать корректный адрес электронной почты.','label.for_validations.error');
        }  
        
        
        
//-----------------------MESSAGE LIMITATION FIELD EMEIL-------------------------
        
    /**
     * @group a
     */    
    public function Message3FildEmeil (NotificationListTester $I){  
        $I->amOnPage(NotificationCreateFrontPage::$PageURL);
        $I->scrollToElement($I, '.infoBut.isDrop');
        $I->click(NotificationCreateFrontPage::$ButtonOnPage);
        $I->waitForText('Сообщить о появлении'); 
        $I->fillField(NotificationCreateFrontPage::$FildEmeilPresent, '');
        $I->click(NotificationCreateFrontPage::$FildEmeilPresent);
        $I->fillField(NotificationCreateFrontPage::$FildEmeilPresent, 'ad@muuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuin.com');
        $I->click(NotificationCreateFrontPage::$ButtonSendPresent);
        $I->waitForElement(NotificationCreateFrontPage::$FildEmeilMessage);
        $I->see('Поле Email не может превышать 50 символов в длину.', NotificationCreateFrontPage::$FildEmeilMessage);   
        } 
        
        
        
//-----------------------MESSAGE LIMITATION FIELD PHONE-------------------------
        
    /**
     * @group a
     */    
    public function Message1FildPhone (NotificationListTester $I){  
        $I->amOnPage(NotificationCreateFrontPage::$PageURL);
        $I->scrollToElement($I, '.infoBut.isDrop');
        $I->click(NotificationCreateFrontPage::$ButtonOnPage); 
        $I->waitForText('Сообщить о появлении'); 
        $I->click(NotificationCreateFrontPage::$FildPhonePresent);
        $I->fillField(NotificationCreateFrontPage::$FildPhonePresent, '0123654789012365481201236547890123654812012365478900');
        $I->wait('3');       
        $I->click(NotificationCreateFrontPage::$ButtonSendPresent);
        $I->waitForElement(NotificationCreateFrontPage::$FildPhoneMessage);
        $I->see('Поле Телефон не может превышать 50 символов в длину.','label.for_validations.error');   
        } 
        
        
        
//-----------------------MESSAGE CORRECTLY FIELD PHONE--------------------------
        
    /**
     * @group a
     */    
    public function Message2FildPhone (NotificationListTester $I){  
        $I->amOnPage(NotificationCreateFrontPage::$PageURL);
        $I->scrollToElement($I, '.infoBut.isDrop');
        $I->click(NotificationCreateFrontPage::$ButtonOnPage); 
        $I->waitForText('Сообщить о появлении'); 
        $I->click(NotificationCreateFrontPage::$FildPhonePresent);
        $I->fillField(NotificationCreateFrontPage::$FildPhonePresent, '0112 54 !@# QWE a 987');
        $I->click(NotificationCreateFrontPage::$ButtonSendPresent);
        $I->waitForElement(NotificationCreateFrontPage::$FildPhoneMessage);
        $I->see('Поле Телефон должно содержать целое число.','label.for_validations.error');   
        } 
        
        
        
//-----------------------MESSAGE OF CREATE NOTIFI-------------------------------
        
    /**
     * @group a
     */    
    public function CreateNotificationMessage (NotificationListTester $I){
        $I->amOnPage(NotificationCreateFrontPage::$PageURL);
        $I->amOnPage(NotificationCreateFrontPage::$PageURL);
        $I->scrollToElement($I, '.infoBut.isDrop');
        $I->click(NotificationCreateFrontPage::$ButtonOnPage); 
        $I->waitForText('Сообщить о появлении');
        $I->fillField(NotificationCreateFrontPage::$FildUserPresent, 'QWE 123 йцу zxc !@# ЪХЗ');
        $I->fillField(NotificationCreateFrontPage::$FildEmeilPresent, 'Africa@Boombaataa.net');
        $I->fillField(NotificationCreateFrontPage::$FildPhonePresent, '0123456789');
        $I->fillField(NotificationCreateFrontPage::$FildCommentPresent,  InitTest::$textSymbols);
        $I->click(NotificationCreateFrontPage::$ButtonSendPresent);
        $I->waitForElement('div.jspPane > div.inside-padd');
        $I->waitForText('Спасибо');
        $I->see('Спасибо');
        } 
        
        
        
//-----------------------PRESENCE CREATEING NOTIFI ADMIN------------------------
        
    /**
     * @group a
     */    
    public function VerifyPresenceCreatedNotification (NotificationListTester $I){
        $I->amOnPage(NotificationListPage::$ListPageURL);
        $I->see('Africa@Boombaataa.net', NotificationListPage::$ListLinkEditting);
        $I->click(NotificationListPage::$ListLinkEditting);
        $I->see('Редактирование уведомления', NotificationListPage::$EditingTitle);
        }
        
        
        
//-----------------------PRESENCE INPUT VALUES FIELDS ADMIN---------------------
        
    /**
     * @group a
     */    
    public function VerifyInputValuesCreatedNotification (NotificationListTester $I){
        $I->amOnPage(NotificationListPage::$ListPageURL);
        $I->click(NotificationListPage::$ListLinkEditting);
        $I->seeInField(NotificationListPage::$EditingFildName, 'QWE 123 йцу zxc !@# ЪХЗ');
        $I->seeInField(NotificationListPage::$EditingFildEmail, 'Africa@Boombaataa.net');
        $I->seeInField(NotificationListPage::$EditingFildPhone, '0123456789');
        $I->seeInField(NotificationListPage::$EditingFildComment,  InitTest::$textSymbols);
        }  
        
        
        
//---------------------------CLEARING-------------------------------------------  
        
    /**
     * @group a
     */    
    public function DeleteNotification(NotificationListTester $I){
        $I->amOnPage(NotificationListPage::$ListPageURL);
        $I->click(NotificationListPage::$ListMainCheckBox);
        $I->waitForElementVisible(NotificationListPage::$ListButtonDelete);
        $I->click(NotificationListPage::$ListButtonDelete);
        $I->wait('1');
        $I->click(NotificationListPage::$DeleteWindowButtonDelete);
        $I->wait('1');
        InitTest::ClearAllCach($I);
    } 
            
            
            
}
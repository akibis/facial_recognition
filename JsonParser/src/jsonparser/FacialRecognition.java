/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package jsonparser;

/**
 *
 * @author Kevin Soncuya
 */
public class FacialRecognition {

    String contactID;
    float confidenceLevel;
    boolean isMatched;

    public String getContactID() {
        return contactID;
    }
    
    public void setContactID(String contact_id) {
        this.contactID = contact_id;
    }
    
    public float confidence_level() {
        return confidenceLevel;
    }
    
    public void setConfidenceLevel(float confidenceLevel) {
        this.confidenceLevel = confidenceLevel;
    }
    
    public boolean getIsMatched() {
        return isMatched;
    }
    
    public void setIsMatched(boolean isMatched) {
        this.isMatched = isMatched;
    }
}

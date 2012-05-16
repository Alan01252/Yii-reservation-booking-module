<?php
/**
 * @author alan.hollis http://alanhollis.com
 * @copyright alan.hollis http://alanhollis.com
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * 
 * Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:
 * Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.
 * Neither the name of Yii Software LLC nor the names of its contributors may be used to endorse or promote products derived from this software without specific prior written permission.
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */
class BusinessTest extends CTestCase
{
	public function testCreate()
	{
		$business = new Business();
		$business->setAttributes(array(
				'name' => "Test Hotel",
				'description' => "Test Hotels Description"
				));
		$this->assertTrue($business->save(false));
		return $business;
	}
	
	public function testDelete()
	{
		$business = $this->testCreate();
		$this->assertTrue($business->delete());
	}
	
	public function testUpdate()
	{	
		
		$business = Business::model()->find(array('condition'=>'name=:name','params'=>array(':name'=>'Test Hotel')));
		$business->description = "Test changing business description";
		$this->assertTrue($business->save(false));
		
		$business = Business::model()->find(array('condition'=>'name=:name','params'=>array(':name'=>'Test Hotel')));
		$this->assertEquals($business->description,"Test changing business description");	
	}
}